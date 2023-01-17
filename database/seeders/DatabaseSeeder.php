<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Course;
use App\Models\Curriculum;
use App\Models\Lead;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $user = new User();
        $user->name = 'Super Admin';
        $user->email =  'ashrafulalamsajal@gmail.com';
        $user->password = bcrypt('password');
        $user->save();
//
//        $role = Role::create([
//            'name' => 'Super Admin'
//        ]);
//
//        $permission = Permission::create([
//            'name'  => 'create-admin'
//        ]);
//
//        $role->givePermissionTo($permission);
//        $permission->assignRole($role);
//
//        $user->assignRole($role);
        $defaultPermissions = ['Super Admin', 'create-admin', 'lead-management', 'user-management'];
        foreach($defaultPermissions as $permission){
            Permission::create([
                'name' => $permission
            ]);
        }


        $this->create_user_with_role('Super Admin', 'super admin', 'superadmin@gmail.com' );
        $this->create_user_with_role('Communication', 'Communication Team', 'communication@gmail.com' );
        $teacher = $this->create_user_with_role('Teacher', 'Teacher', 'teacher@gmail.com' );
        $this->create_user_with_role('Lead', 'Lead', 'lead@gmail.com' );

        Lead::factory(100)->create();


        $course = Course::create([
            'name'  => 'Laravel',
            'slug'  => 'Laravel',
            'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.',
            'image' => 'https://picsum.photos/seed/picsum/200/300',
            'price' => 500,
            'user_id' => $teacher->id
        ]);

        Curriculum::factory(10)->create();

    }
        //line
        private function create_user_with_role($type, $name, $email){

        $role = Role::create([
            'name' => $type
        ]);

        $user = User::create([
            'name'  => $name,
            'email' => $email,
            'password' => bcrypt('password')
        ]);


        if($type == 'Super Admin'){
            $role->givePermissionTo(Permission::all());
        }elseif($type == 'Lead'){
            $role->givePermissionTo('lead-management');
        }


      $user->assignRole($role);
        return $user;

    }




}
