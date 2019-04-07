<?php
namespace Composer\Installers;

class DrupalInstaller extends BaseInstaller
{
    protected $locations = array(
        'core'             => 'core/',
        'module'           => 'modules/{$name}/',
        'theme'            => 'themes/{$name}/',
        'library'          => 'libraries/{$name}/',
        'profile'          => 'profiles/{$name}/',
        'drush'            => 'drush/{$name}/',
        'custom-theme'     => 'themes/custom/{$name}/',
        'custom-module'    => 'modules/custom/{$name}/',
        'custom-profile'   => 'profiles/custom/{$name}/',
        'drupal-multisite' => 'sites/{$name}/'
    );

    public function inflectPackageVars($vars)
    {
        $vars = parent::inflectPackageVars($vars);
        $cwd = getcwd();
        if (is_link("$cwd/inactive")) {
          $vars['inactive'] = readlink("$cwd/inactive");
        }
        return $vars;
    }
}
