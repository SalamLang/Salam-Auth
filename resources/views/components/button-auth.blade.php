<button {{ $attributes->merge(['type' => 'submit', 'class' => 'w-full text-white bg-[#FF5C00] flex transition-all duration-300 justify-center items-center mt-4 h-[50px] rounded-[15px] outline-0 cursor-pointer']) }}>
    {{ $slot }}
</button>
