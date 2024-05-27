@extends('layout.main')

@section('content')
<x-navbar-admin></x-navbar-admin>
<div class="bg-polos">
    <div class="isi d-flex justify-content-center">
        <div>
            <input type="radio" name="radio-milih" id="pilihan1" value="jahit" checked>
            <label class="label px-5 py-2 fs-4" for="pilihan1">Jahit</label>
        </div>
        <div class="px-3"></div>
        <div>
            <input type="radio" name="radio-milih" value="vermak" id="pilihan2">
            <label class="label px-5 py-2 fs-4" for="pilihan2">Vermak</label>
        </div>
    </div>
    <div class="isi-card">
        <div id="section-jahit" style="display: none">
            <x-pesananjahit></x-pesananjahit>
        </div>
        <div id="section-vermak" style="display: none">
            <x-pesananvermak></x-pesananvermak>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        function toggleSections() {
            var jahitSection = document.getElementById('section-jahit');
            var vermakSection = document.getElementById('section-vermak');
            var selectedValue = document.querySelector('input[name="radio-milih"]:checked').value;
            
            if (selectedValue === 'jahit') {
                jahitSection.style.display = 'block';
                vermakSection.style.display = 'none';
            } else if (selectedValue === 'vermak') {
                jahitSection.style.display = 'none';
                vermakSection.style.display = 'block';
            }
        }

        var radios = document.querySelectorAll('input[name="radio-milih"]');
        radios.forEach(function(radio) {
            radio.addEventListener('change', toggleSections);
        });

        toggleSections();
    });
</script>
@endsection