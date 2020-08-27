Two table

User  							Address
	id									id
	name								user_id
	email								address
	password	


1) One To one(hasOne)

	Model (user)

		function user_To_address(){
			return $this->hasOne('App\ Address’,  'user_id',  'id');
		}      
		N:B:    hasOne('Destination model',  'Destination model(foreign key'),  'to this model (‘primary key');
		
	Controller

		public function index(){
			$users = User::with('user_To_address')->get();
			return view('home', compact(‘users'));
		}

	home.blade.php
		
		@foreach($users as $user)
			<td>{{ $user->name}}</td> 
			<td>{{ $user->Email}}</td> 
			<td>{{ $user->user_To_address->address}}</td> 
		@endforeach
 


	
	
					
