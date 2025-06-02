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
            <div class="profile-card__detail">
                <p><strong>Name:</strong> {{ $user->name }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Registered At:</strong> {{ $user->created_at->format('d M Y') }}</p>
            </div>
            <button class="profile-card__button">Edit Profile</button>
        </div>
    </div>
</body>
</html>
