@props([
	'id' => 'autocomplete-'. uniqid(),
	'placeholder' => 'Search...',
	'indexName' => '',
	'publicKey' => '',
	'host' => 'http://127.0.0.1:7700',
])

<div
	x-data="{
		client: null,
		host: '{{ $host }}',
		apiKey: '{{ $publicKey }}',
		state: '',
		searchString: '',
		results: {
			hits: [],
		},

		async search() {
			this.state = 'searching';
			this.results = await this.client.index('{{ $indexName }}').search(this.searchString);
			this.state = 'finished';
		},

		highlightedIndex: 0,
      	highlightPrevious() {
	        if (this.highlightedIndex > 0) {
	          	this.highlightedIndex = this.highlightedIndex - 1;
	          	this.scrollIntoView();
	        }
	    },
      	highlightNext() {
	        if (this.highlightedIndex < this.$refs.results.children.length - 1) {
	        	this.highlightedIndex = this.highlightedIndex + 1;
	        	this.scrollIntoView();
	        }
      	},
      	scrollIntoView() {
	        this.$refs.results.children[this.highlightedIndex].scrollIntoView({
	        	block: 'nearest',
	          	behavior: 'smooth'
	        });
      	},
	    goToLink() {
			// Because of alpine template count increases by one
	    	window.location.href = this.$refs.results.children[this.highlightedIndex+1].firstElementChild.href;
		}
	}"
	x-init="client = new MeiliSearch({
		host: host,
		apiKey: apiKey
	})"
	x-cloak
	class="relative"
>
	<div class="relative py-3 flex w-full flex-1 items-center">
		<label class="sr-only">Search</label>
    	<svg class="w-6 h-6 text-gray-300 -mr-8 z-10 relative" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"></rect><circle cx="116" cy="116" r="84" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></circle><line x1="175.39356" y1="175.40039" x2="223.99414" y2="224.00098" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></line></svg>

        <input
        	type="search"
        	autocomplete="off"
            id="search"
            name="search"
            class="form-input bg-gray-50 focus:bg-white border-gray-200 mt-px pl-10 leading-none placeholder-gray-400 shadow-none rounded-lg flex-1 w-full transition duration-150 ease-in-out"
            placeholder="{{ $placeholder }}"
			x-model="searchString"
			x-on:input.debounce.600ms="search()"
      		x-on:keydown.arrow-down.stop.prevent="highlightNext()"
      		x-on:keydown.arrow-up.stop.prevent="highlightPrevious()"
            x-on:keydown.enter="goToLink()"
        />

        <div class="absolute top-0 bottom-0 right-0" x-show="state === 'searching'">
            <div class="base-spinner w-10 h-16 text-tory-blue-400"></div>
        </div>
    </div>


	<div x-cloak x-show="searchString.length > 0" style="height: 400px; z-index: 500" class="border border-gray-200 absolute left-0 bg-white py-3 bg-white shadow-lg rounded-lg overflow-x-hidden w-full overflow-y-auto -mt-1">

		<div x-show="results.hits.length < 1 && state === 'finished'">
			@isset($notFound)
				{{ $notFound }}
			@else
				<div class="h-full w-full text-center py-6 text-gray-600">
					Not data found. Search again...
				</div>
			@endisset
		</div>

		<ul x-show="results.hits.length > 0 && state != 'searching'" x-ref="results" class="divide-y divide-gray-100">
			<template x-for='(result, resultIndex) in results.hits' :key="resultIndex">
				<li :class="{'bg-indigo-100': resultIndex === highlightedIndex}" class="group cursor-pointer hover:bg-gray-100 hover:text-indigo-600 px-4 py-2 flex items-center w-full">
					{{ $slot }}
				</li>
			</template>
		</ul>

		<div class="w-full divide-y divide-y-100" x-show="state === 'searching'">
			@isset($searching)
				{{ $searching }}
			@else
				<template x-for="i in 10">
					<div class="px-4 py-3">
						<div class="w-full h-6 mb-1 bg-gray-100 rounded"></div>
						<div class="w-1/2 h-4 mb-2 bg-gray-100 rounded"></div>
						<div class="flex space-x-3">
							<div class="w-16 h-2 bg-gray-200 rounded-full"></div>
							<div class="w-16 h-2 bg-gray-100 rounded-full"></div>
							<div class="w-16 h-2 bg-gray-200 rounded-full"></div>
							<div class="w-16 h-2 bg-gray-100 rounded-full"></div>
						</div>
					</div>
				</template>
			@endif
		</div>
	</div>
</div>

<script src='https://cdn.jsdelivr.net/npm/meilisearch@latest/dist/bundles/meilisearch.umd.js'></script>
