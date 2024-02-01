@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8">
        <div class="max-w-md mx-auto bg-white p-8 rounded shadow-md">
            <h1 class="text-2xl font-semibold mb-6">Admin inlog pagina</h1>

            <div class="mb-4">
                <label for="input" class="block text-sm font-medium text-gray-600">Invoerveld:</label>
                <input type="text" id="input" name="input" class="mt-1 p-2 w-full border rounded-md">
            </div>

            <p class="text-gray-700">Voer de code in die in jou app staat</p>

            <a href="{{ route('admin.orders.index') }}" id="submitButton" class="mt-4 inline-block bg-blue-500 text-white py-2 px-4 rounded opacity-50 cursor-not-allowed hover:bg-blue-600" data-enabled="false">Ga naar het Admin paneel</a>
        </div>
    </div>

    <script>
        var inputField = document.getElementById('input');
        var submitButton = document.getElementById('submitButton');

        inputField.addEventListener('input', function() {
            var inputValue = this.value.trim();
            var isEnabled = inputValue === '34894';

            submitButton.dataset.enabled = isEnabled;

            if (isEnabled) {
                submitButton.classList.remove('opacity-50', 'cursor-not-allowed');
                submitButton.addEventListener('click', validateAndSubmit);
            } else {
                submitButton.classList.add('opacity-50', 'cursor-not-allowed');
                submitButton.removeEventListener('click', validateAndSubmit);
            }
        });

        function validateAndSubmit(event) {
            if (submitButton.dataset.enabled === 'true') {
                console.log('Geldige klik');
            }
            event.preventDefault();
        }
    </script>
@endsection