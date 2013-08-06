modoauth2
=========

Modx extra to provide aouth2 authentication to access profile data. This is an implementation using the oAuth2 Server PHP library. This was intended for private use so no suppport can be provided at the moment. Use at your own risk.

**Dependencies**

- A web login extra. Login is used by default.
- Installation of https://github.com/bshaffer/oauth2-server-php in your MODx project. This extra assumes this library is already installed.
- DB Connection setup on Server snippet. The oauth2-server-php library requires these parameters to establish db connection to handle codes, tokens, refresh tokens, clients and users.

**References**

-oAuth2 Server PHP Step-by-Step Walkthrough : http://bshaffer.github.io/oauth2-server-php-docs/cookbook/

