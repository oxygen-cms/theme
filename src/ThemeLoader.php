<?php

namespace Oxygen\Theme;

interface ThemeLoader {

    /**
     * Returns the current theme.
     *
     * @return string
     */
    public function getCurrentTheme();

    /**
     * Changes the current theme.
     *
     * @param string $theme the name of the new theme
     */
    public function setCurrentTheme($theme);

}