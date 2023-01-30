@if(session()->has('message'))
    <div class="fixed left-1/2 top-6 translate-y-12 transform -translate-x-1/2 transition-all duration-200 ease-in" data-replace="{ 'opacity-0': 'opacity-100', 'translate-y-12': 'translate-y-0' }">
        <div 
            id="toast-success" 
            class="flex items-center p-4 mb-4 w-full max-w-xs text-gray-800 bg-lime-400 rounded-sm border-0 border-gray-800" role="alert" 
        >
            <div 
                class="mx-3 text-LG font-normal text-center"
            >
                {{session('message')}}
                @if(session()->has('message_part_two'))
                    <br>
                    {{session('message_part_two')}}
                @endif
            </div>
        </div>
    </div>
@endif

<script>
    // document.addEventListener("DOMContentLoaded", function(){
    //     var replacers = document.querySelectorAll('[data-replace]');
    //     for(var i=0; i<replacers.length; i++){
    //         let replaceClasses = JSON.parse(replacers[i].dataset.replace.replace(/'/g, '"'));
    //         Object.keys(replaceClasses).forEach(function(key) {
    //             replacers[i].classList.remove(key);
    //             replacers[i].classList.add(replaceClasses[key]);
    //         });
    //     }
    // });
    document.addEventListener("DOMContentLoaded", function(){
        setTimeout(function(){
            var replacers = document.querySelectorAll('[data-replace]');
            for(var i=0; i<replacers.length; i++){
                let replaceClasses = JSON.parse(replacers[i].dataset.replace.replace(/'/g, '"'));
                Object.keys(replaceClasses).forEach(function(key) {
                    replacers[i].classList.remove(key);
                    replacers[i].classList.add(replaceClasses[key]);
                });
            }
        }, 0 /* 0.001 seconds */ );

        setTimeout(function(){
            var replacers = document.querySelectorAll('[data-replace]');
            for(var i=0; i<replacers.length; i++){
                let replaceClasses = JSON.parse(replacers[i].dataset.replace.replace(/'/g, '"'));
                Object.keys(replaceClasses).forEach(function(key) {
                    replacers[i].classList.add(key);
                    replacers[i].classList.remove(replaceClasses[key]);
                });
            }
        }, 2000 /* 3.000 seconds */ );
    });
</script>