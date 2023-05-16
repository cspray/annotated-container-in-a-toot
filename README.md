# Annotated Container ... in a toot!

Inspired by a [post on phpc.social by @ian](https://phpc.social/@ian/110380652469868165), a small, proof-of-concept showing a core concept behind Annotated Container... Bring Your Own Container!

This implementation is meant to show that autowiring is not required to use Annotated Container and can be integrated with whatever style of dependency injection you prefer.

This demo requires to install a dev branch from Annotated Container:

- Annotated Container requires pulling from `dev-main` to allow overriding `ContainerFactory` implementations. This will be released properly as part of v2.1.

## Running Demo

You should clone this repo and then run composer install.

```
git clone git@github.com:cspray/annotated-container-in-a-toot.git
cd annotated-container-in-a-toot && composer install
```

After that, from the repo's root directory you can run the demo script:

```
php app.php
```

If everything runs correctly you should see output similar to the following:

```
class Cspray\AnnotatedContainerInAToot\Widget#652 (1) {
  public readonly string $id =>
  string(32) "Annotated Container ... in a toot!"
}
```

Please check out the rest of this codebase for more details!