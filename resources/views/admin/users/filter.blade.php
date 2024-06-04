@include('admin.layouts.partials.crud-components.filter', [
    'create_route' => $create_route,
    'filters' => [
        [
            'type' => 'text',
            'name' => 'filter[full_name]',
            'label' => 'name',
            'required' => 'false',
            'placeholder' => 'name',
        ],
        [
            'type' => 'text',
            'name' => 'filter[email]',
            'label' => 'email',
            'required' => 'false',
            'placeholder' => 'email',
        ],
        [
            'type' => 'text',
            'name' => 'filter[phone]',
            'label' => 'phone',
            'required' => 'false',
            'placeholder' => 'phone',
        ],
    ],
])
