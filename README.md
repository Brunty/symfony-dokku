symfony-dokku
=============

To install & get working (assuming you have the dokku client installed locally)

```bash
git clone git@github.com:Brunty/symfony-dokku.git
cd symfony-dokku
dokku apps:create symfony
dokku config:set SYMFONY_ENV=prod
dokku mysql:create symfony-db
dokku mysql:link symfony-db symfony
git push dokku master
```
