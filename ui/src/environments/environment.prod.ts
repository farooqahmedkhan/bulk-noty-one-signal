// This file can be replaced during build by using the `fileReplacements` array.
// `ng build ---prod` replaces `environment.ts` with `environment.prod.ts`.
// The list of file replacements can be found in `angular.json`.
// BASE_URL: 'http://onestopsys.com/demo/adeel-osnu/public/api',

export const environment = {
  production: true,
  API: {
    BASE_URL: 'http://18.188.169.213:8000/api',
    ROUTES: {
      APPS: '/applications/',      
      TEMPLATES: '/templates/'
    }
  }
};

/*
 * In development mode, for easier debugging, you can ignore zone related error
 * stack frames such as `zone.run`/`zoneDelegate.invokeTask` by importing the
 * below file. Don't forget to comment it out in production mode
 * because it will have a performance impact when errors are thrown
 */
// import 'zone.js/dist/zone-error';  // Included with Angular CLI.
