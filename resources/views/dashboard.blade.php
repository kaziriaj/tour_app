<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800">
            🌍 Tour Gallery Dashboard
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Welcome Card -->
            <div class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white p-8 rounded-xl shadow-lg mb-8">
                <h3 class="text-2xl font-semibold mb-2">
                    Welcome, {{ Auth::user()->name }} 👋
                </h3>
                <p class="text-lg">
                    Explore and share your beautiful travel memories from
                    Nepal, India, Bhutan & Sri Lanka.
                </p>
            </div>

            <!-- Quick Action Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <!-- View Photos -->
                <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
                    <h4 class="text-xl font-semibold mb-2">📸 View Gallery</h4>
                    <p class="text-gray-600 mb-4">
                        Explore all tour photos shared by you and your friends.
                    </p>
                    <a href="#" class="inline-block bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                        Go to Gallery
                    </a>
                </div>

                <!-- Upload Photo -->
                <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
                    <h4 class="text-xl font-semibold mb-2">⬆ Upload Photo</h4>
                    <p class="text-gray-600 mb-4">
                        Add your new travel memories to the gallery.
                    </p>
                    <a href="#" class="inline-block bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">
                        Upload Now
                    </a>
                </div>

                <!-- Profile -->
                <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
                    <h4 class="text-xl font-semibold mb-2">👤 My Profile</h4>
                    <p class="text-gray-600 mb-4">
                        Manage your account and personal information.
                    </p>
                    <a href="{{ route('profile.edit') }}" class="inline-block bg-purple-500 text-white px-4 py-2 rounded-lg hover:bg-purple-600">
                        Edit Profile
                    </a>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
