<?php

namespace App\Livewire\Client;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Http;

class Setting extends Component
{
    use WithFileUploads;

    public $name = '';
    public $email = '';
    public $phone = '';
    public $address = '';
    public $city = '';
    public $ward = '';
    public $password = '';
    public $password_confirmation = '';
    public $avatar = null;
    public $currentAvatar = '';
    public $provinces = [];
    public $districts = [];
    public $wards = [];
    public $selectedProvince = null;
    public $selectedDistrict = null;

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
            'city' => 'nullable|string|max:100',
            'ward' => 'nullable|string|max:100',
            'password' => 'nullable|string|min:8|same:password_confirmation',
            'avatar' => 'nullable|image|max:1024',
        ];
    }

    public function mount()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $this->name = $user->name;
            $this->email = $user->email;
            $this->phone = $user->phone;
            $this->address = $user->address ?? '';
            $this->city = $user->city ?? '';
            $this->ward = $user->ward ?? '';
            $this->currentAvatar = $user->avatar ?? 'default.png';

            $this->provinces = $this->fetchProvinces();

            if ($user->city) {
                $this->selectedProvince = $user->city;
                $this->districts = $this->fetchDistricts($user->city);
            }

            if ($user->address) {
                $districtCode = substr($user->address, 0, 5);
                if (is_numeric($districtCode)) {
                    $this->selectedDistrict = $districtCode;
                    $this->wards = $this->fetchWards($districtCode);
                }
            }
        } else {
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để truy cập trang này.');
        }
    }

    public function updatedSelectedProvince($provinceCode)
    {
        $this->districts = $this->fetchDistricts($provinceCode);
        $this->selectedDistrict = null;
        $this->wards = [];
        $this->city = $provinceCode;
        $this->ward = '';
    }

    public function updatedSelectedDistrict($districtCode)
    {
        $this->wards = $this->fetchWards($districtCode);
        $this->address = $districtCode;
        $this->ward = ''; 
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, $this->rules());
    }

    public function save()
    {
        $this->validate($this->rules());

        $user = Auth::user();

        $updateData = [
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'city' => $this->city,
            'ward' => $this->ward,
        ];

        if ($this->avatar) {
            $avatarPath = $this->avatar->store('avatars', 'public');
            $updateData['avatar'] = $avatarPath;
        }

        $user->update($updateData);

        if (!empty($this->password)) {
            $user->update(['password' => bcrypt($this->password)]);
        }

        session()->flash('message', 'Thông tin đã được cập nhật thành công!');
        $this->currentAvatar = $user->fresh()->avatar ?? 'default.png';
    }

    private function fetchProvinces()
    {
        $response = Http::get('https://provinces.open-api.vn/api/');
        if ($response->successful()) {
            return $response->json();
        }
        return [];
    }

    private function fetchDistricts($provinceCode)
    {
        $response = Http::get("https://provinces.open-api.vn/api/p/{$provinceCode}?depth=2");
        if ($response->successful() && isset($response->json()['districts'])) {
            return $response->json()['districts'];
        }
        return [];
    }

    private function fetchWards($districtCode)
    {
        $response = Http::get("https://provinces.open-api.vn/api/d/{$districtCode}?depth=2");
        if ($response->successful() && isset($response->json()['wards'])) {
            return $response->json()['wards'];
        }
        return [];
    }

    public function render()
    {
        return view('livewire.client.setting')->layout('components.layouts.app')->title('Cài đặt');
    }
}
