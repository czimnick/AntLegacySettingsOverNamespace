### AntLegacySettingsOverNamespace

test plugin for [pull-request 15](https://github.com/shopware-blog/shopware-environment-variables/pull/15)

##### Shopware config patch
```diff
--- config.php  2019-04-05 01:03:09.563100087 +0200
+++ config.patched.php  2019-04-05 00:32:36.000000000 +0200
@@ -1,5 +1,5 @@
 <?php
-return [
+return array_merge([
     'db' => [
         'username' => 'root',
         'password' => 'test',
@@ -7,4 +7,4 @@
         'host' => 'localhost',
         'port' => '3306'
     ]
-];
+], require(__DIR__ . '/custom/plugins/AntLegacySettingsOverNamespace/example_config.php'));
```

##### Testing

```bash
cd <shop-root>
git clone git@github.com:czimnick/AntLegacySettingsOverNamespace.git custom/plugins/AntLegacySettingsOverNamespace
git clone git@github.com:shopware-blog/shopware-environment-variables.git custom/plugins/ShopwareEnvironmentVariables
php bin/console sw:plugin:refresh

php bin/console sw:plugin:install ShopwareEnvironmentVariables
php bin/console sw:plugin:activate ShopwareEnvironmentVariables

php bin/console sw:plugin:install AntLegacySettingsOverNamespace
php bin/console sw:plugin:activate AntLegacySettingsOverNamespace

php bin/console sw:cache:clear

php bin/console antlegacysettings:test:command
```

##### Excepted Output without patch:
```
PluginConfig element 'demoConfig' from ConfigReader;
TEST123_DE

PluginConfig element 'demoConfig' from Shopware()->Config()->getByNamespace('AntLegacySettingsOverNamespace', 'demoConfig'):
Just a demo configuration, without any effects.
```

##### Excepted Output with patch:
```
PluginConfig element 'demoConfig' from ConfigReader;
TEST123_DE

PluginConfig element 'demoConfig' from Shopware()->Config()->getByNamespace('AntLegacySettingsOverNamespace', 'demoConfig'):
TEST123_DE
```
