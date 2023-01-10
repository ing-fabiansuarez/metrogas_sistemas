<?php

namespace App\Handlers;

use App\Models\User as EloquentUser;
use Adldap\Models\User as LdapUser;
use App\Models\Jobtitle;

class LdapAttributeHandler
{
    /**
     * Synchronizes ldap attributes to the specified model.
     *
     * @param LdapUser $ldapUser
     * @param EloquentUser $eloquentUser
     *
     * @return void
     */
    public function handle(LdapUser $ldapUser, EloquentUser $eloquentUser)
    {
        /**
         * Aqui relacionamos lso atributos que vamos a sincronysar
         */
        $eloquentUser->username = $ldapUser->getAccountName();
        $eloquentUser->name = $ldapUser->getCommonName();
        $eloquentUser->email_ldap = $ldapUser->getUserPrincipalName();
        $eloquentUser->jobtitle_ldap = $ldapUser->getDescription();
        $eloquentUser->email = $ldapUser->getEmail();
    }
}
