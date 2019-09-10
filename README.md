# pkc (PHP Kubectl)

## Use

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

## Commands 

*samplenamespace* is the variable argument that you must provide, a Kubernetes valid namespace.

All output shows elapsed time like:

```bash
Elapsed time: 0.35s
```

but this footer part is not mentioned in samples below.

### app:get-namespace

**Input:**

```bash
pkc.phar app:get-namespace samplenamespace
```
**Output:**

```bash
Namespace samplenamespace is Active and has 14d
```

### app:get-resourcequota

**Input:**

```bash
pkc.phar app:get-resourcequota samplenamespace
```
**Output:**

```bash
Namespace samplenamespace was created at 2019-08-22T16:05:00Z
```

### app:get-pods

**Input:**

```bash
pkc.phar app:get-pods samplenamespace
```
**Output:**

```bash
Namespace samplenamespace
pod=podsample1 ready=1/1 status=Running restarts=0 age=6d11h
pod=podsample2 ready=1/1 status=Running restarts=0 age=6d11h
pod=podsample3 ready=1/1 status=Running restarts=0 age=6d11h
```

### app:get-replicasets

**Input:**

```bash
pkc.phar app:get-replicasets samplenamespace
```
**Output:**

```bash
Namespace samplenamespace
name=backend1 desired=0 current=0 ready=0 age=16d
name=backend2 desired=2 current=2 ready=2 age=15d
name=frontend1 desired=0 current=0 ready=0 age=15d
name=frontend2 desired=1 current=1 ready=1 age=13d
name=nginx-sample1 desired=1 current=0 ready=0 age=12d
name=nginx-sample2 desired=1 current=0 ready=0 age=12d
name=nginx-sample3 desired=1 current=0 ready=0 age=12d
name=nginx-sample4 desired=1 current=0 ready=0 age=12d
name=nginx-sample5 desired=1 current=0 ready=0 age=12d
name=teste-sample desired=1 current=1 ready=0 age=5h44m
```

### app:get-volumes

**Input:**

```bash
pkc.phar app:get-volumes samplemodule
```
**Output:**

```bash
Module samplemodule
pod=backend-sample1 ready=1/1 status=Running restarts=0 age=10d
pod=backend-sample2 ready=1/1 status=Running restarts=0 age=10d
```

### app:create-pod

**Input:**

```bash
pkc.phar app:create-pod path-to-yaml-file
```
**Output:**

```bash
pod/nginx-sample created
```

### app:delete-pod

**Input:**

```bash
pkc.phar app:delete-pod samplenamespace samplemmodule
```
**Output:**

```bash
pod "nginx-sample" deleted

```
  
## Build

First, change **phar.readonly** to **Off**

Then, run 

```bash
vendor/bin/phing
```

Finally, change **phar.readonly** to **On** **[DON'T FORGET IT]**

## Screenshots

**pkc.phar** no arguments

![pkc.phar](images/pkc01.png)

**pkc.phar app:get-namespace**

![pkc.phar](images/pkc02.png)

**pkc.phar app:get-resourcequota**

![pkc.phar](images/pkc03.png)

**pkc.phar app:get-pods**

![pkc.phar](images/pkc04.png)

**pkc.phar app:get-replicasets**

![pkc.phar](images/pkc05.png)

**pkc.phar app:get-volumes**

![pkc.phar](images/pkc06.png)

**pkc.phar app:create-pod**

![pkc.phar](images/pkc07.png)

**pkc.phar app:delete-pod**

![pkc.phar](images/pkc08.png)

