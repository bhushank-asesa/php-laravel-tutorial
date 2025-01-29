# Data Table

## View

### CDN
```html
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
```

### Table 
```html
<table id="studentTable" class="display m-1 p-2 table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>
```

### Script

- Clear table
```js
if ($.fn.DataTable.isDataTable('#studentTable')) {
    $('#studentTable').DataTable().destroy(); // Destroy the existing instance
}
```
- Get Data by jax
```js
$('#studentTable').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url: "{{ route('admin-get-student-list') }}",
        type: 'GET',
        data: function(d) {
            d.customRequestVariable = customRequestVariable;
        },
    },
    order: [
        [1, 'desc']
    ],
    columns: [{
            data: 'id',
            name: 'id'
        },
        {
            data: 'username',
            name: 'username'
        },
        {
            data: 'child_name',
            name: 'Name'
        },
        {
            data: 'email',
            name: 'Email'
        },
        {
            data: 'action',
            name: 'action',
            orderable: false,
            searchable: false
        }
    ]
});
```

## PHP
### Function
```php 
$subscriptionCheck = $request->input('subscriptionCheck');
        // Pagination parameters
$limit = $request->input('length'); // Number of records per page
$offset = $request->input('start'); // Starting point
$search = $request->input('search')['value']; // Search term
$orderColumnIndex = $request->input('order')[0]['column']; // Order column index
$orderDirection = $request->input('order')[0]['dir']; // Order direction (asc/desc)
$orderColumnName = $request->input('columns')[$orderColumnIndex]['data']; // Column name
$tableOrderColumnName = ""; // change columnname if table column name is dofferent from request order column

// Query with search
$query = User::query();

$totalData = $query->count(); // Total records before filtering
$filteredData = $query->count(); // Total records after filtering

$users = $query->orderBy($orderColumnName, $orderDirection)
    ->offset($offset)
    ->limit($limit)
    ->get();


$data = [];
foreach ($users as $user) {

    $data[] = [
        'id' => $user->id,
        'username' => $user->username,
        'child_name' => $user->child_name,
        'email' => $user->email,
        'action' => 'Action buttons'
    ];
}

return response()->json([
    'draw' => intval($request->input('draw')),
    'recordsTotal' => $totalData,
    'recordsFiltered' => $filteredData,
    'data' => $data,
]);