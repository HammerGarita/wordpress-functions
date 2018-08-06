# List of useful WordPress functions
A collection of functions that will help you give more power to WordPress website.

## Using
Don’t just include these files in your project. Look at the content, update the options and see what works for you!
The code is not optimized for speed, it’s optimized for readability. Sometimes the impact on performance makes these functions not eligible.

 You should probably keep some things visible to you or a super admin. Check the user role like this:
```php
if ( ! current_user_can( 'administrator' ) ) {
  // Clean it up!
}
```

## Contribution
Feel free to [suggest anything](https://github.com/HammerGarita/wordpress-functions/issues) you see missing or want to be fixed!
