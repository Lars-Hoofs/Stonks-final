@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <div class="flex flex-wrap -mx-4">
            <!-- Store Information Section -->
            <div class="w-full lg:w-1/2 px-4 mb-6 lg:mb-0">
    <h1 class="text-2xl font-bold mb-6">Onze winkels</h1>
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full leading-relaxed">
            <thead>
                <tr>
                    <th class="px-6 py-4 border-b-2 border-gray-200 bg-gray-100 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">
                        Locatie
                    </th>
                    <th class="px-6 py-4 border-b-2 border-gray-200 bg-gray-100 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">
                        Openingstijden
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="px-6 py-6 border-b border-gray-200 bg-white text-sm">
                        Winkel centrum woensxl - Eindhoven
                    </td>
                    <td class="px-6 py-6 border-b border-gray-200 bg-white text-sm">
                        Maandag - Vrijdag: 9:00 - 21:00
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-6 border-b border-gray-200 bg-white text-sm">
                        Oelemarkt 1 - Weert
                    </td>
                    <td class="px-6 py-6 border-b border-gray-200 bg-white text-sm">
                        Maandag - Vrijdag: 9:00 - 20:00
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-6 border-b border-gray-200 bg-white text-sm">
                        Stratumsedijk 23 - Eindhoven
                    </td>
                    <td class="px-6 py-6 border-b border-gray-200 bg-white text-sm">
                        Maandag - Vrijdag: 9:00 - 21:00
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

            <!-- Map Section -->
            <div class="w-full lg:w-1/2 px-4">
                <div class="h-96 mb-4">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d19878.96034022036!2d5.425708074316403!3d51.47889970000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c6deb64046dc03%3A0x6acda7e8c6bbcaf!2sMagic%20Doner%20Pizza!5e0!3m2!1snl!2sbe!4v1706717836136!5m2!1snl!2sbe" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
@endsection