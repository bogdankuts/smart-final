<?php

namespace App\Http\Middleware;

use App\Exceptions\LanguageException;
use Closure;
use Illuminate\Support\Facades\File;

class AdvancedLanguageMiddleware {
	//TODO::refactor and approve
	//TODO:: flash something to user
	//TODO:: multiple parameters

	/**
	 * Array of all available languages for the site
	 *
	 * @var array
	 */
	protected $availableLanguages = [];

	/**
	 * Default language for site
	 * will be returned if unknown language is found
	 * or no language parameter passed to route
	 *
	 * @var string
	 */
	protected $defaultLanguage;

	/**
	 * Language used for site
	 * will be returned after the language is resolved
	 *
	 * @var string
	 */
	protected $language;

	/**
	 * Default parameter name to be accepted from route
	 *
	 * @var string
	 */
	protected $parameterName = 'lang';

	/**
	 * Indicates which fallback to use
	 * if set to false -> use default language
	 * if set to true -> throw an exception
	 *
	 * @var bool
	 */
	protected $useErrorFallback = false;




	/**
	 * Resolve the name of the parameter used in routes
	 *
	 * @param string $parameterName
	 */
	private function resolveParameterName($parameterName) {
		if(!is_null($parameterName)) {
			$this->parameterName = $parameterName;
		}
	}

	/**
	 * Resolve which language to use depending on parameter
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param string                   $parameterName
	 *
	 * @return string
	 * @throws LanguageException
	 */
	private function defineLanguage($request, $parameterName) {
		$this->resolveParameterName($parameterName);
		$this->getDefaultLanguage();
		$this->getAvailableLanguages();

		$language = $request->route()->parameter($this->parameterName);

		if ($language && in_array($language, $this->availableLanguages)) {
			$this->language = $language;
		} elseif($this->useErrorFallback) {
			throw new LanguageException;
		} else {
			$this->language = $this->defaultLanguage;
			$message = "Sorry, the site is not available in $language language.<br>
                        Please check it in $this->defaultLanguage language";
			$this->flashMessageToUser($message);
		}
	}


	/**
	 * Set the array of available languages based on directories
	 * in resources/lang
	 */
	private function getAvailableLanguages() {
		$directories = \File::directories(resource_path().'/lang');
		$languages = [];

		foreach ($directories as $directory) {
			$languages[] = substr(strrchr($directory, '/lang'), 1);
		}

		$this->availableLanguages = $languages;
	}

	/**
	 *Get the default language value from config file
	 */
	private function getDefaultLanguage() {
		$this->defaultLanguage = config('app.locale');
	}

	private function flashMessageToUser($message) {
		\Session::flash('incorrect_lang', $message);
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure                  $next
	 * @param parameterName              null
	 * @return mixed
	 */
	public function handle($request, Closure $next, $parameterName = null) {
		$this->defineLanguage($request, $parameterName);

		\App::setLocale($this->language);

		return $next($request);
	}
}
