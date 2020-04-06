<?php

namespace Oxygen\Theme;

class ThemeManager {

    /**
     * Themes of the ThemeManager.
     *
     * @var array
     */
    protected $themes;

    /**
     * The theme loader
     *
     * @var \Oxygen\Theme\ThemeLoader
     */
    protected $loader;

    /**
     * Constructs the ThemeManager.
     *
     * @param \Oxygen\Theme\ThemeLoader $loader
     */
    public function __construct(ThemeLoader $loader) {
        $this->themes = [];
        $this->loader = $loader;
    }

    /**
     * Registers a theme.
     *
     * @param Theme $theme
     */
    public function register(Theme $theme) {
        $this->themes[$theme->getKey()] = $theme;
    }

    /**
     * Makes a theme.
     *
     * @param array $arguments
     */
    public function make(array $arguments) {
        $theme = new Theme($arguments['key']);
        unset($arguments['key']);
        $theme->fillFromArray($arguments);
        $this->register($theme);
    }

    /**
     * Returns a theme by name.
     *
     * @param string $name
     * @return \Oxygen\Theme\Theme
     * @throws \Oxygen\Theme\ThemeNotFoundException if the theme was not found
     */
    public function get($name) {
        if(isset($this->themes[$name])) {
            return $this->themes[$name];
        } else {
            throw new ThemeNotFoundException('Theme ' . $name . ' not found');
        }
    }


    /**
     * Returns all themes.
     *
     * @return array
     */
    public function all() {
        return $this->themes;
    }

    /**
     * Returns the theme loader
     *
     * @return ThemeLoader
     */
    public function getLoader() {
        return $this->loader;
    }

    /**
     * Returns the current theme.
     *
     * @return Theme
     * @throws ThemeNotFoundException
     */
    public function current() {
        return $this->get($this->loader->getCurrentTheme());
    }
}
