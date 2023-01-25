<?php

namespace App\Http\Livewire\Users;

use Adldap\Laravel\Facades\Adldap;
use App\Handlers\LdapAttributeHandler;
use App\Models\User;
use Exception;
use Livewire\Component;

class UsersCreate extends Component
{

    public $username;
    public $model;
    private $userLdap;

    public function render()
    {
        return view('livewire.users.users-create', ['userLdap' => $this->userLdap]);
    }

    public function search()
    {
        //se hace la conexion a el directorio activo para vverificar el usuario
        try {
            $this->userLdap = Adldap::search()->where('samaccountname', '=', $this->username)->first();
            if (!isset($this->userLdap)) {
                return  $this->emit('mensaje', [
                    'typeMsg' => 1,
                    'title' => 'No se encontro el usuario',
                    'cuerpo' => 'No existe usuario en el directorio activo'
                ]);
            }
        } catch (Exception $e) {
            return  $this->emit('mensaje', [
                'typeMsg' => 1,
                'title' => 'Hubo un error en la conexion al directorio activo',
                'cuerpo' => $e->getMessage()
            ]);
        }
    }

    public function store()
    {
        $this->userLdap = Adldap::search()->where('samaccountname', '=', $this->username)->first();
        
        try {
            if (isset($this->userLdap)) {
                //determina si el usuario existe
                if ($user = User::where('username', $this->userLdap->getAccountName())->first()) {

                    return  $this->emit('mensaje', [
                        'typeMsg' => 1,
                        'title' => 'El usuario ya exite',
                    ]);
                }

                $model = new User();
                $model->username = $this->userLdap->getAccountName();
                $model->name = $this->userLdap->getCommonName();
                $model->email_ldap = $this->userLdap->getUserPrincipalName();
                $model->jobtitle_ldap = $this->userLdap->getDescription();
                $model->email = $this->userLdap->getEmail();
                $model->objectguid = $this->userLdap->getAuthIdentifier();

                //asignamos el rol aqui
                /* if ($eloquentUser->username == 'fsuarez') {
                    $eloquentUser->syncRoles('Administrador');
                } else {
                    $eloquentUser->syncRoles('Rol Basico');
                } */

                //agregamos el cargo que se nos paso

                $model->save();

                $this->emit('mensaje', [
                    'typeMsg' => 2,
                    'title' => 'Se creo nuevo usuario',
                    'cuerpo' => 'El usuario se guardo correctamente'
                ]);

                return redirect()->route('usuarios.index');
            } {
                return  $this->emit('mensaje', [
                    'typeMsg' => 1,
                    'title' => 'No se encontro usuario',
                    'cuerpo' => 'El usuario no cargo correctamente'
                ]);
            }
        } catch (Exception $e) {
            return  $this->emit('mensaje', [
                'typeMsg' => 1,
                'title' => 'Hubo un error en la conexion al directorio activo',
                'cuerpo' => $e->getMessage()
            ]);
        }
    }
}
