# **Dê um lar a seu Pet**

## Rotas

----

### 1. Register

Receive user data and returns json data with user created.

* **URL**
  /register
* **Method:**
 `POST`

* **Data Params**
**Required:** <br>
`name=[String]` <br>
`email=[String]` <br>
`password=[String]` <br>
`confirm_password=[String]` <br>

* **Success Response:**
  + **Code:** 200 <br />
    **Content:** 

```
{
    "success": true,
    "data": {
        "token": {{valid_bearer_token}},
        "name": "Leo"
    },
    "message": "User successfully registered!"
}
```

 
* **Error Response:**
  + **Code:** 401 UNAUTHORIZED <br />
    **Content:** `{ error : "You are unauthorized to make this request." }`

```javascript
    $.ajax({
        url: "/users/1",
        dataType: "json",
        type: "GET",
        success: function(r) {
            console.log(r);
        }
    });
```

## License

----
The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>
