<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'Trường :attribute phải được chấp nhận.',
    'accepted_if'          => 'Trường :attribute phải được chấp nhận khi :other là :value.',
    'active_url'           => 'Trường :attribute phải là URL hợp lệ.',
    'after'                => 'Trường :attribute phải là ngày sau :date.',
    'after_or_equal'       => 'Trường :attribute phải là ngày sau hoặc bằng :date.',
    'alpha'                => 'Trường :attribute chỉ được chứa chữ cái.',
    'alpha_dash'           => 'Trường :attribute chỉ được chứa chữ cái, số, dấu gạch ngang và gạch dưới.',
    'alpha_num'            => 'Trường :attribute chỉ được chứa chữ cái và số.',
    'array'                => 'Trường :attribute phải là một mảng.',
    'ascii'                => 'Trường :attribute chỉ được chứa ký tự alphanumeric và ký hiệu.',
    'before'               => 'Trường :attribute phải là ngày trước :date.',
    'before_or_equal'      => 'Trường :attribute phải là ngày trước hoặc bằng :date.',
    'between'              => [
        'array'   => 'Trường :attribute phải có giữa :min và :max phần tử.',
        'file'    => 'Trường :attribute phải có kích thước giữa :min và :max kilobytes.',
        'numeric' => 'Trường :attribute phải có giữa :min và :max.',
        'string'  => 'Trường :attribute phải có giữa :min và :max ký tự.',
    ],
    'boolean'              => 'Trường :attribute phải là true hoặc false.',
    'can'                  => 'Trường :attribute chứa một giá trị không được phép.',
    'confirmed'            => 'Xác nhận trường :attribute không khớp.',
    'current_password'     => 'Mật khẩu hiện tại không đúng.',
    'date'                 => 'Trường :attribute phải là ngày tháng hợp lệ.',
    'date_equals'          => 'Trường :attribute phải là ngày tháng bằng với :date.',
    'date_format'          => 'Trường :attribute phải trùng với định dạng :format.',
    'decimal'              => 'Trường :attribute phải có :decimal chữ số sau dấu thập phân.',
    'declined'             => 'Trường :attribute phải bị từ chối.',
    'declined_if'          => 'Trường :attribute phải bị từ chối khi :other là :value.',
    'different'            => 'Trường :attribute và :other phải khác nhau.',
    'digits'               => 'Trường :attribute phải có :digits chữ số.',
    'digits_between'       => 'Trường :attribute phải có từ :min đến :max chữ số.',
    'dimensions'           => 'Trường :attribute có kích thước hình ảnh không hợp lệ.',
    'distinct'             => 'Trường :attribute có giá trị trùng lặp.',
    'doesnt_end_with'      => 'Trường :attribute không được kết thúc bằng các giá trị sau: :values.',
    'doesnt_start_with'    => 'Trường :attribute không được bắt đầu bằng các giá trị sau: :values.',
    'email'                => 'Trường :attribute phải là địa chỉ email hợp lệ.',
    'ends_with'            => 'Trường :attribute phải kết thúc bằng một trong các giá trị sau: :values.',
    'enum'                 => 'Giá trị :attribute được chọn không hợp lệ.',
    'exists'               => 'Giá trị đã chọn trong :attribute không hợp lệ.',
    'file'                 => 'Trường :attribute phải là một tệp tin.',
    'filled'               => 'Trường :attribute phải có giá trị.',
    'gt'                   => [
        'array'   => 'Trường :attribute phải có nhiều hơn :value phần tử.',
        'file'    => 'Trường :attribute phải lớn hơn :value kilobytes.',
        'numeric' => 'Trường :attribute phải lớn hơn :value.',
        'string'  => 'Trường :attribute phải có nhiều hơn :value ký tự.',
    ],
    'gte'                  => [
        'array'   => 'Trường :attribute phải có ít nhất :value phần tử.',
        'file'    => 'Trường :attribute phải lớn hơn hoặc bằng :value kilobytes.',
        'numeric' => 'Trường :attribute phải lớn hơn hoặc bằng :value.',
        'string'  => 'Trường :attribute phải có ít nhất :value ký tự.',
    ],
    'image'                => 'Trường :attribute phải là hình ảnh.',
    'in'                   => 'Giá trị đã chọn trong :attribute không hợp lệ.',
    'in_array'             => 'Trường :attribute phải tồn tại trong :other.',
    'integer'              => 'Trường :attribute phải là số nguyên.',
    'ip'                   => 'Trường :attribute phải là địa chỉ IP hợp lệ.',
    'ipv4'                 => 'Trường :attribute phải là địa chỉ IPv4 hợp lệ.',
    'ipv6'                 => 'Trường :attribute phải là địa chỉ IPv6 hợp lệ.',
    'json'                 => 'Trường :attribute phải là chuỗi JSON hợp lệ.',
    'lowercase'            => 'Trường :attribute phải là chữ thường.',
    'lt'                   => [
        'array'   => 'Trường :attribute phải có ít hơn :value phần tử.',
        'file'    => 'Trường :attribute phải nhỏ hơn :value kilobytes.',
        'numeric' => 'Trường :attribute phải nhỏ hơn :value.',
        'string'  => 'Trường :attribute phải có ít hơn :value ký tự.',
    ],
    'lte'                  => [
        'array'   => 'Trường :attribute không được có nhiều hơn :value phần tử.',
        'file'    => 'Trường :attribute phải nhỏ hơn hoặc bằng :value kilobytes.',
        'numeric' => 'Trường :attribute phải nhỏ hơn hoặc bằng :value.',
        'string'  => 'Trường :attribute phải có ít hơn hoặc bằng :value ký tự.',
    ],
    'mac_address'          => 'Trường :attribute phải là địa chỉ MAC hợp lệ.',
    'max'                  => [
        'array'   => 'Trường :attribute không được có nhiều hơn :max phần tử.',
        'file'    => 'Trường :attribute không được lớn hơn :max kilobytes.',
        'numeric' => 'Trường :attribute không được lớn hơn :max.',
        'string'  => 'Trường :attribute không được lớn hơn :max ký tự.',
    ],
    'max_digits'           => 'Trường :attribute không được có nhiều hơn :max chữ số.',
    'mimes'                => 'Trường :attribute phải là một tệp tin loại: :values.',
    'mimetypes'            => 'Trường :attribute phải là một tệp tin loại: :values.',
    'min'                  => [
        'array'   => 'Trường :attribute phải có ít nhất :min phần tử.',
        'file'    => 'Trường :attribute phải có ít nhất :min kilobytes.',
        'numeric' => 'Trường :attribute phải ít nhất là :min.',
        'string'  => 'Trường :attribute phải có ít nhất :min ký tự.',
    ],
    'min_digits'           => 'Trường :attribute phải có ít nhất :min chữ số.',
    'missing'              => 'Trường :attribute phải bị thiếu.',
    'missing_if'           => 'Trường :attribute phải bị thiếu khi :other là :value.',
    'missing_unless'       => 'Trường :attribute phải bị thiếu trừ khi :other là :value.',
    'missing_with'         => 'Trường :attribute phải bị thiếu khi :values có mặt.',
    'missing_with_all'     => 'Trường :attribute phải bị thiếu khi :values có mặt.',
    'multiple_of'          => 'Trường :attribute phải là bội số của :value.',
    'not_in'               => 'Giá trị đã chọn trong :attribute không hợp lệ.',
    'not_regex'            => 'Định dạng trường :attribute không hợp lệ.',
    'numeric'              => 'Trường :attribute phải là số.',
    'password'             => [
        'letters'       => 'Trường :attribute phải chứa ít nhất một chữ cái.',
        'mixed'         => 'Trường :attribute phải chứa ít nhất một chữ in hoa và một chữ thường.',
        'numbers'       => 'Trường :attribute phải chứa ít nhất một số.',
        'symbols'       => 'Trường :attribute phải chứa ít nhất một ký tự đặc biệt.',
        'uncompromised' => 'Giá trị :attribute đã cho đã xuất hiện trong một rò rỉ dữ liệu. Vui lòng chọn một :attribute khác.',
    ],
    'present'              => 'Trường :attribute phải có mặt.',
    'present_if'           => 'Trường :attribute phải có mặt khi :other là :value.',
    'present_unless'       => 'Trường :attribute phải có mặt trừ khi :other là :value.',
    'present_with'         => 'Trường :attribute phải có mặt khi :values có mặt.',
    'present_with_all'     => 'Trường :attribute phải có mặt khi tất cả các giá trị trong :values có mặt.',
    'prohibited'           => 'Trường :attribute bị cấm.',
    'prohibited_if'        => 'Trường :attribute bị cấm khi :other là :value.',
    'prohibited_unless'    => 'Trường :attribute bị cấm trừ khi :other là một trong :values.',
    'prohibits'            => 'Trường :attribute ngăn chặn :other từ việc có mặt.',
    'regex'                => 'Định dạng của trường :attribute không hợp lệ.',
    'required'             => 'Trường :attribute là bắt buộc.',
    'required_array_keys'  => 'Trường :attribute phải chứa các khóa: :values.',
    'required_if'          => 'Trường :attribute là bắt buộc khi :other là :value.',
    'required_if_accepted' => 'Trường :attribute là bắt buộc khi :other được chấp nhận.',
    'required_unless'      => 'Trường :attribute là bắt buộc trừ khi :other là một trong :values.',
    'required_with'        => 'Trường :attribute là bắt buộc khi :values có mặt.',
    'required_with_all'    => 'Trường :attribute là bắt buộc khi tất cả các giá trị trong :values có mặt.',
    'required_without'     => 'Trường :attribute là bắt buộc khi :values không có mặt.',
    'required_without_all' => 'Trường :attribute là bắt buộc khi không có giá trị nào trong :values có mặt.',
    'same'                 => 'Trường :attribute và :other phải khớp nhau.',
    'size'                 => [
        'array'   => 'Trường :attribute phải chứa :size phần tử.',
        'file'    => 'Trường :attribute phải có kích thước :size kilobytes.',
        'numeric' => 'Trường :attribute phải có kích thước :size.',
        'string'  => 'Trường :attribute phải có :size ký tự.',
    ],
    'starts_with'          => 'Trường :attribute phải bắt đầu bằng một trong các giá trị sau: :values.',
    'string'               => 'Trường :attribute phải là một chuỗi.',
    'timezone'             => 'Trường :attribute phải là múi giờ hợp lệ.',
    'unique'               => 'Giá trị của :attribute đã được sử dụng.',
    'uploaded'             => 'Tải lên trường :attribute không thành công.',
    'uppercase'            => 'Trường :attribute phải là chữ in hoa.',
    'url'                  => 'Trường :attribute phải là địa chỉ URL hợp lệ.',
    'ulid'                 => 'Trường :attribute phải là ULID hợp lệ.',
    'uuid'                 => 'Trường :attribute phải là UUID hợp lệ.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
