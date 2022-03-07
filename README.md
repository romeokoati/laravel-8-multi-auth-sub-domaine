# laravel-8-multi-auth-sub-domaine
Authentication Laravel 8 Fortify multi authentication and sub domaine

multi-agent authentication system with 3 subdomains realized with laravel 8 and fortify. The subdomains can be defined with 3 environment variables in the .evn file.
The definition variables of the subdomains and the domain are :
PREFIX_SUBDOMAIN_ADMIN : for the admin subdomain
PREFIX_SUBDOMAIN_EDITOR : for the subdomain of users
PREFIX_SUBDOMAIN_MY : for the subdomain of the member area
APP_DOMAIN : for the domain definition

The deployment is done as a classic laravel project.
Each page has a RateLImit of 60 seconds for 5 attempts with a custom throll message available on the login page

The usable routes are :
mydomain.domain/login
mydomain.domain/forgot-password
mydomain.domain/reset-password

some caputures of the login page and subdomains
![image](https://user-images.githubusercontent.com/71483238/156976965-f5f835cd-8568-4aa4-9169-acf432a98e5c.png)
![image](https://user-images.githubusercontent.com/71483238/156977023-6e354a99-aea5-458a-9c38-ad3f75891015.png)
![image](https://user-images.githubusercontent.com/71483238/156977070-f2c9a9e5-7656-464b-943f-0f50a85ca9af.png)
![image](https://user-images.githubusercontent.com/71483238/156977170-eb385d1f-8bf9-470b-8caa-d2c555e4be25.png)
![image](https://user-images.githubusercontent.com/71483238/156977240-201d28b3-6e55-4111-9f77-73e5dfb249f6.png)
![image](https://user-images.githubusercontent.com/71483238/156977343-9ce407b2-08f2-4724-a95e-748a13fcdd85.png)


Have fun
