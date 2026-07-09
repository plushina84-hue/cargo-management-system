<button {{ $attributes->merge([
'class' =>
'inline-flex items-center justify-center px-6 py-3 
bg-blue-600 border border-transparent 
rounded-xl font-semibold text-white 
shadow-lg hover:bg-blue-700 
focus:outline-none focus:ring-4 
focus:ring-blue-300 
transition duration-300'
]) }}>

{{ $slot }}

</button>
