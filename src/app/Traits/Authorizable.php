<?php

namespace App\Traits;

trait Authorizable
{
    private $abilities = [
        'index' => 'show',
        'create' => 'create',
        'store' => 'create',
        'show' => 'show',
        'edit' => 'edit',
        'update' => 'edit',
        'destroy' => 'destroy',
    ];

    private $exceptionRoutes = [
    ];

    private $exceptionControllers = [
    ];

    /**
     * Override of callAction to perform the authorization before
     *
     * @param $method
     * @param $parameters
     * @return mixed
     */
    public function callAction($method, $parameters)
    {
        $inExceptionControllers = in_array(get_class($this), $this->exceptionControllers);
        $inExceptionRoutes = in_array($this->getRouteName(), $this->exceptionRoutes);

        if (!$inExceptionRoutes && !$inExceptionControllers) {
            $this->authorize($this->getAbility($method));
        }

        return parent::callAction($method, $parameters);
    }

    public function getAbility($method, $routeName = null)
    {
        $routeName = explode('.', is_null($routeName) ? $this->getRouteName() : $routeName);
        $action = data_get($this->getAbilities(), $method);

        if (count($routeName) == 1) {
            return $routeName[0];
        } elseif (count($routeName) == 2) {
            return $action ? $routeName[0] . '.' . $routeName[1] . '.' . $action : $routeName[0] . '.' . $routeName[1];
        } elseif (count($routeName) == 3) {
            return $action ? $routeName[0] . '.' . $routeName[1] . '.' . $action : null;
        } elseif (count($routeName) == 4) {
            return $action ? $routeName[0] . '.' . $routeName[1] . '.' . $routeName[2] . '.' . $action : null;
        } elseif (count($routeName) == 5) {
            return $action ? $routeName[0] . '.' . $routeName[1] . '.' . $routeName[2] . '.' . $routeName[3] . '.' . $action : null;
        }
    }

    private function getAbilities()
    {
        return $this->abilities;
    }

    public function setAbilities($abilities)
    {
        $this->abilities = $abilities;
    }

    public function getRouteName()
    {
        return \Request::route()->getName();
    }
}
