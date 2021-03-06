<?php

namespace Oxygen\Theme;

use Closure;

class BootThemeMiddleware {

    /**
     * The theme manager.
     *
     * @var ThemeManager
     */
    protected $themeManager;

    /**
     * Create a new filter instance.
     *
     * @param  ThemeManager  $themes
     */
    public function __construct(ThemeManager $themes) {
        $this->themeManager = $themes;
    }

    /**
     * Handle an incoming request.
     *
     * @param  mixed  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        try {
            $currentTheme = $this->themeManager->current();
            $currentTheme->boot();
        } catch(ThemeNotFoundException $e) {
            // no theme to boot
        }

        return $next($request);
    }
}
