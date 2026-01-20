<section class="bg-white dark:bg-gray-900 transition-colors duration-300">
    <div class="py-8 lg:py-16 px-4 mx-auto max-w-2xl">
        <div class="text-center mb-12">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">
                Contact Us
            </h2>
            <p class="font-light text-gray-500 dark:text-gray-400 sm:text-lg">
                Got a technical issue? Need details about our plan? Let us know.
            </p>
        </div>

        @if (session('success'))
            <div
            x-data="{ show: true }"
            x-show="show"
            x-init="setTimeout(() => show = false, 3000)"
            x-transition.duration.500ms
                class="mb-8 p-4 text-sm font-semibold text-emerald-800 bg-emerald-50 border border-emerald-200 rounded-xl flex items-center shadow-sm animate-in fade-in duration-500">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd"></path>
                </svg>
                {{ session('success') }}
            </div>
        @endif

        <form wire:submit.prevent="save" class="space-y-6">
            <div class="group">
                <label for="name"
                    class="block mb-2 text-sm font-semibold text-gray-900 dark:text-gray-300 group-focus-within:text-blue-600 transition-colors">
                    Your Name
                </label>
                <input wire:model="contactForm.name" type="text" id="name" autocomplete="off"
                    class="block w-full p-3 text-sm text-gray-900 bg-gray-50 rounded-xl border border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:placeholder-gray-500 dark:text-white transition-all outline-none"
                    placeholder="John Doe">
                @error('contactForm.name')
                    <p class="mt-1.5 text-xs text-red-500 font-medium flex items-center">
                        <span class="mr-1">●</span> {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="group">
                <label for="email"
                    class="block mb-2 text-sm font-semibold text-gray-900 dark:text-gray-300 group-focus-within:text-blue-600 transition-colors">
                    Your Email
                </label>
                <input wire:model="contactForm.email" type="email" id="email"
                    class="block w-full p-3 text-sm text-gray-900 bg-gray-50 rounded-xl border border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:placeholder-gray-500 dark:text-white transition-all outline-none"
                    placeholder="name@company.com">
                @error('contactForm.email')
                    <p class="mt-1.5 text-xs text-red-500 font-medium flex items-center">
                        <span class="mr-1">●</span> {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="group sm:col-span-2">
                <label for="message"
                    class="block mb-2 text-sm font-semibold text-gray-900 dark:text-gray-300 group-focus-within:text-blue-600 transition-colors">
                    Your Message
                </label>
                <textarea wire:model="contactForm.message" id="message" rows="5"
                    class="block w-full p-3 text-sm text-gray-900 bg-gray-50 rounded-xl border border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:placeholder-gray-500 dark:text-white transition-all outline-none resize-none"
                    placeholder="How can we help you?"></textarea>
                @error('contactForm.message')
                    <p class="mt-1.5 text-xs text-red-500 font-medium flex items-center">
                        <span class="mr-1">●</span> {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit" wire:loading.attr="disabled"
                    class="w-full sm:w-fit py-3.5 px-8 text-sm font-bold text-center text-white rounded-xl bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 transition-all active:scale-95 disabled:opacity-70 disabled:cursor-not-allowed inline-flex items-center justify-center">

                    <svg wire:loading wire:target="save" class="animate-spin -ml-1 mr-3 h-4 w-4 text-white"
                        fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                            stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                        </path>
                    </svg>

                    <span wire:loading.remove wire:target="save">Send Message</span>
                    <span wire:loading wire:target="save">Processing...</span>
                </button>
            </div>
        </form>
    </div>
</section>
