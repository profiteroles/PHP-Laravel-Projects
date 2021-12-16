<div x-data @permissions-update="console.log('permissions updated', $event.detail.permissions)"
     data-permissions='{{$slot}}' class="text-black mt-6">
    <div x-data="permissionSelect()" x-init="init('parentEl')" @click.away="clearSearch()"
         @keydown.escape="clearSearch()">
        <div class="relative" @keydown.enter.prevent="addPermission(textInput)">
            <input x-model="textInput" x-ref="textInput" @input="search($event.target.value)"
                   id="permissions"
                   name="permissions[]"
                   class="shadow bg-transparent appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:text-gray-200"
                   placeholder="Add New Permission">
            <div :class="[open ? 'block' : 'hidden']">
                <div class="absolute z-40 left-0 mt-2 w-full">
                    <div class="py-1 text-sm bg-white rounded shadow-lg border border-gray-300">
                        <a @click.prevent="addPermission(textInput)"
                           class="block py-1 px-5 cursor-pointer hover:bg-indigo-600 hover:text-white">Press Enter to Add this
                            permission "<span class="font-semibold underline" x-text="textInput"></span>"</a>
                    </div>
                </div>
            </div>
            <!-- selections -->
            <template x-for="(permission, index) in permissions">
                <div class="bg-indigo-100 inline-flex items-center text-sm rounded mt-2 mr-1">
                    <span class="ml-2 mr-1 leading-relaxed truncate max-w-xs" x-text="permission"></span>
                    <button @click.prevent="removePermission(index)"
                            class="w-6 h-8 inline-block align-middle text-gray-500 hover:text-gray-600 focus:outline-none">
                        <svg class="w-6 h-6 fill-current mx-auto" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                  d="M15.78 14.36a1 1 0 0 1-1.42 1.42l-2.82-2.83-2.83 2.83a1 1 0 1 1-1.42-1.42l2.83-2.82L7.3 8.7a1 1 0 0 1 1.42-1.42l2.83 2.83 2.82-2.83a1 1 0 0 1 1.42 1.42l-2.83 2.83 2.83 2.82z"/>
                        </svg>
                    </button>
                </div>
            </template>
        </div>
    </div>
</div>

<script>
    function permissionSelect() {
        return {
            open: false,
            textInput: '',
            permissions: ['something'],
            init() {
                this.permissions = JSON.parse(this.$el.parentNode.getAttribute('data-permissions'));
            },
            addPermission(permission) {
                permission = permission.trim()
                if (permission != "" && !this.hasPermission(permission)) {
                    this.permissions.push(permission)
                }
                this.clearSearch()
                this.$refs.textInput.focus()
                this.firePermissionsUpdateEvent()
            },
            firePermissionsUpdateEvent() {
                this.$el.dispatchEvent(new CustomEvent('permissions-update', {
                    detail: {permissions: this.permissions},
                    bubbles: true,
                }));
            },
            hasPermission(permission) {
                var permission = this.permissions.find(e => {
                    return e.toLowerCase() === permission.toLowerCase()
                })
                return permission != undefined
            },
            removePermission(index) {
                this.permissions.splice(index, 1)
                this.firePermissionsUpdateEvent()
            },
            search(q) {
                if (q.includes(",")) {
                    q.split(",").forEach(function (val) {
                        this.addPermission(val)
                    }, this)
                }
                this.toggleSearch()
            },
            clearSearch() {
                this.textInput = ''
                this.toggleSearch()
            },
            toggleSearch() {
                this.open = this.textInput != ''
            }
        }
    }
</script>
