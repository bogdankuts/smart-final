<?php

namespace App\Http\Middleware;

use Closure;

class LanguageMiddleware {
	//TODO::create fallback function and custom variants of fallbacks instead of changing the language change.

	/**
	 * Array of all available languages for the site
	 *
	 * @var array
	 */
	protected $availableLanguages = ['ua', 'ru'];


	/**
	 * Default language for site
	 * will be returned if unknown language is found
	 * or no language parameter passed to route
	 *
	 * @var string
	 */
	protected $defaultLanguage = 'ua';


	/**
	 * Default parameter name to be accepted from route
	 *
	 * @var string
	 */
	protected $parameterName = 'lang';


	/**
	 * Resolve the name of the parameter used in routes
	 *
	 * @param $parameterName
	 */
	private function resolveParameterName($parameterName) {
		if($parameterName) {
			$this->parameterName = $parameterName;
		}
	}

	/**
	 * Resolve which language to use depending on parameter
	 *
	 * @param $request
	 * @param $parameterName
	 *
	 * @return string
	 */
	private function defineLanguage($request, $parameterName) {
		$this->resolveParameterName($parameterName);

		$language = $request->route()->parameter($this->parameterName);

		if (!$language || !in_array($language, $this->availableLanguages)) {
			$language = $this->defaultLanguage;
		}

		return $language;
	}

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param parameterName  null
     * @return mixed
     */
    public function handle($request, Closure $next, $parameterName = null) {

	    $language = $this->defineLanguage($request, $parameterName);

	    \App::setLocale($language);

        return $next($request);
    }
}
