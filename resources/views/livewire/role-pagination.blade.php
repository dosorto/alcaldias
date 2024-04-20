<div>
   
    @foreach ($roles as $role)
    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
        <th scope="row" class="px-6 py-4">{{ $loop->iteration }}</th>
        <td class="px-6 py-4">{{ $role->name }}</td>
        <td class="px-6 py-4">{{ $role->description }}</td>
        <td class="px-6 py-4">
            <div class="divide-y divide-gray-300 dark:divide-gray-700">
                @foreach ($role->permissions as $permission)
                    <div class="py-1">{{ $permission->name }}</div>
                
    @endforeach

    {{ $roles->links() }}
</div>