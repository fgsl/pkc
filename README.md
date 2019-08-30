# pkc (PHP Kubectl)

## use

### Linux distributions

If php is installed in `/usr/bin`, you can run direclty

```bash
pkc.phar
```
Alternatively, you can run

```bash
php pkc.phar
```
or create a symlink to your php in `/usr/bin`.

You can move pkc.phar to /usr/bin as pck, so you can run it as a command:

```bash
pkc
```

### Windows

if php.exe is declared in PATH environment variable, you can run it so:

```
php.exe pkc.phar
```

You can create a .BAT file that contains this call.
  
## build

First, change **phar.readonly** to **Off**

Then, run 

```bash
bin/build
```

Finally, change **phar.readonly** to **On** **[DON'T FORGET IT]**

