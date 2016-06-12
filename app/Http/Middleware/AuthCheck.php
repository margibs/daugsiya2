<?php namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Contracts\Auth\Guard;

class AuthCheck {

	/**
	 * Used by NgController to check if a user is authenticated
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	protected $auth;

	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}

	public function handle($request, Closure $next)
	{
		// if not logged in or banned or not active
		if (!$this->auth->check())
		{
			return redirect('login');
		}

		return $next($request);
	}

}

