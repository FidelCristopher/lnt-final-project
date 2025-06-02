<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Profile Page</title>
    <link rel="stylesheet" href="{{ asset('foodmart/css/profilestyle.css') }}">
</head>
<body>
    <div class="main-content">
        <div class="profile-card">
            <h3 class="profile-card__title">Profile</h3>

            @auth
                <div class="profile-card__detail">
                    <p><strong>Name:</strong> {{ $user->name }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <p><strong>Registered At:</strong> {{ $user->created_at->format('d M Y') }}</p>
                </div>

                <a href="{{ route('profile.edit') }}" class="profile-card__button" style="text-decoration: none;">
                    Edit Profile
                </a>

                <form method="POST" action="{{ route('logout') }}" style="margin-top: 1rem;">
                    @csrf
                    <button type="submit" class="profile-card__button" style="background-color: #ff85b3; color: white; border: none; cursor: pointer;">
                        Logout
                    </button>
                </form>
            @else
                <p>User not logged in.</p>
                <a href="{{ route('login') }}" style="color: #ff85b3;">Login</a> or
                <a href="{{ route('register') }}" style="color: #ff85b3;">Register</a>
            @endauth
        </div>
    </div>
</body>
</html>
