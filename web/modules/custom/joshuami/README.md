# Joshuami Module

This module provides custom functionality for the joshuami website.

## Features

### Automatic Tour Functionality for Anonymous Users

This module includes functionality similar to the tour module's tourauto submodule, but specifically designed for anonymous users. It automatically opens tours for anonymous users on configured routes.

#### How it works:

1. **Configuration**: Administrators can configure which routes should automatically show tours for anonymous users
2. **First Visit Logic**: Option to show tours on the first visit to any page with available tours
3. **Debug Mode**: Optional debug information for administrators
4. **Session Management**: Tracks first visits using session data

#### Configuration:

1. Navigate to `/admin/config/system/joshuami`
2. Enable automatic tours for anonymous users
3. Configure specific routes where tours should open
4. Optionally enable "Show on first visit" for any page with tours
5. Enable debug mode for troubleshooting

#### Routes:

By default, tours will automatically open for anonymous users on these routes:
- `user.login`
- `user.register`
- `node.add`
- `system.admin_content`
- `system.admin`

#### JavaScript:

The module includes JavaScript that:
- Waits for the tour module to be fully initialized
- Automatically activates tours when conditions are met
- Provides debug information in the browser console (when enabled)

#### Files:

- `joshuami.module` - Main module file with hook implementations
- `js/joshuami-tour-auto.js` - JavaScript for automatic tour activation
- `joshuami.libraries.yml` - Library definition
- `src/Form/JoshuamiSettingsForm.php` - Configuration form
- `joshuami.routing.yml` - Route definition for settings
- `config/install/joshuami.settings.yml` - Default configuration

#### Usage:

1. Install and enable the module
2. Create tours using the Tour module
3. Configure the settings at `/admin/config/system/joshuami`
4. Tours will automatically open for anonymous users based on your configuration

#### Customization:

You can modify the `_joshuami_should_open_tour_for_anonymous()` function in `joshuami.module` to add custom logic for when tours should open. 