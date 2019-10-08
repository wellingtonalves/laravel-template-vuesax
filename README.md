# laravel-template-vuesax
Laravel template with Vuesax (VueJs).

- This project contains:
Repository, Nested models,Vue and code generator.


- Command to generate files: php artisan scaffold:generate --all=ModelName
### The system will generate the following files:
- Controller, Model, Service, Repository, Policy, Routes, Migration and VueJs (view).

### Just edit the route file (routes view):
resources/js/src/router.js
resources/js/src/layouts/components/vx-sidebar/sidebarItems.js

### And add policy:
app/Providers/AuthServiceProvider.php

### When you add a new route, add roles in:
database/seeds/RoleTableSeeder.php
