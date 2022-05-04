<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('APIs') }}
        </h2>
    </x-slot>

    <div class="pt-12 pb-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    API Details
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-2 grid-rows-1">
                        <span>API Name</span>
                        <span>{{ $api->name }}</span>
                    </div>

                    <div class="grid grid-cols-2 grid-rows-1">
                        <span>API Route</span>
                        <a href="{{ route('api.hit', [ 'username' => Auth::user()->username, 'api' => $api->slug ]) }}" target="_blank">
                            <span>/api/{{Auth::user()->username}}/{{ $api->slug }}</span><span><i class="fa-solid fa-arrow-up-right-from-square text-gray-400 px-1"></i></span>
                        </a>
                    </div>

                    <div class="grid grid-cols-2 grid-rows-1">
                        <span class="col-span-1">API Method</span>
                        <span class="text-green-700 font-bold col-span-1">{{ $api->method }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" x-data="apiStructureEditData">
                <div class="p-6 bg-white border-b border-gray-200 flex items-center justify-between">
                    <span>API Structure</span>
                    <span>
                        <x-button x-show="!open" id="api-structure-edit-btn" x-on:click="edit">Edit</x-button>
                        <x-button x-show="open" id="api-structure-save-btn" x-on:click="save">Save</x-button>
                        <x-button-secondary class="border border-gray-800 bg-transparent text-gray-800" x-show="open" x-on:click="cancel">Cancel</x-button-secondary>
                    </span>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <code x-show="!open" x-text="JSON.stringify(structure)">
                    </code>
                    <div x-show="open">
                        <template x-for="(item, index) in structure">
                            <div class="flex justify-between items-center my-1">
                                <span x-text="index"></span>
                                <div>
                                    <select class="border rounded-md text-gray-800" x-model="structure[index]">
                                        @foreach ($methods as $key => $option)
                                            <option class="p-2" value="{{ $option }}" x-init="markAsSelected($el, item)">{{ $key }}</option>
                                        @endforeach
                                    </select>
                                    <span x-on:click="remove(index)" class="text-red-600 cursor-pointer"><i class="fa-solid fa-xmark"></i></span>
                                </div>
                            </div>
                        </template>
                        <template x-for="(item, index) in newElements">
                            <div class="flex justify-between items-center my-1">
                                <x-input class="block" x-model="item.name" type="text" required />
                                <div>
                                    <select class="border rounded-md text-gray-800" x-model="item.type">
                                        @foreach ($methods as $key => $option)
                                            <option class="p-2" value="{{ $option }}" x-init="markAsSelected($el, item.type)">{{ $key }}</option>
                                        @endforeach
                                    </select>
                                    <span x-on:click="removeNew(index)" class="text-red-600 cursor-pointer"><i class="fa-solid fa-xmark"></i></span>
                                </div>
                            </div>
                        </template>
                        <div class="flex justify-center items-center my-1">
                            <button x-on:click="addNew" class="hover:bg-gray-800 hover:text-white rounded-md w-1/4 py-3 text-xl">+</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('apiStructureEditData', () => ({
            apiKey: '{{ $api->id }}',
            open: false,
            structure: JSON.parse('{!! $api->structure !!}'),
            newElements: [],
            structureCopy: null,

            edit() {
                this.open = true;
                this.structureCopy = { ...this.structure };
            },
            cancel() {
                this.open = false;
                this.structure = { ...this.structureCopy };
                this.structureCopy = null;
            },
            markAsSelected(el, value){
                if(el.value === value){
                    el.selected = true;
                }
            },
            addNew(){
                this.newElements.push({
                    name: '',
                    type: '',
                });
            },
            remove(index){
                delete this.structure[index];
            },
            removeNew(index){
                this.newElements.splice(index, 1);
            },
            async save(){
                let data = new FormData();
                data.append('api_key', this.apiKey);
                data.append('existing', JSON.stringify(this.structure));
                data.append('new', JSON.stringify(this.newElements));
                await axios.post('/api/structure', data)
                .then((result) => {
                    if(result.data.status === 'success'){
                        this.newElements = [];
                        this.open = false;
                        this.structure = JSON.parse(result.data.data)
                    }
                })
                .catch((error) => {
                    console.error(error);
                });
            }
        }))
    })
    </script>
</x-app-layout>
