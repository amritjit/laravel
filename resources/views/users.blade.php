<ul>
@forelse($users as $user)

	<li>{{ $user->name }}</li>

   
@empty
<li>No users found</li>

@endforelse
{{ $users->links() }}
</ul>