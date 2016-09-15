<template>
    <table class="table table-hover table-bordered">
        <thead>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Roles</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            <tr v-for="user in list" id="row-{{user.id}}">
                <td>
                   {{ user.full_name }}
                </td>
                <td>
                    {{ user.email }}
                </td>
                <td>
                    <div v-if="user.roles.length > 0">
                        <ul>
                            <li v-for="role in user.roles">
                                {{ role.name }}
                            </li>
                        </ul>
                    </div>
                    <div v-else>
                        <p>no tiene roles asignados</p>
                    </div>
                </td>
                <td>
                    <a href="/administracion/usuarios/{{user.id}}/edit">Editar</a> |
                    <form action="/administracion/usuarios/{{user.id}}" method="POST" v-ajax
                          row="row-{{user.id}}">
                        <input type="hidden" name="_method" value="{{method}}">
                        <input type="hidden" name="_token" value="{{token}}">
                        <button type="submit">x</button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
</template>

<script>
    export default {
        props: ['list','method','token'],

        methods:{

        },

        created(){
            this.list = JSON.parse(this.list);

        }
    }
</script>
