<template>
  <div class="container">
    <div class="card-deck">
      <div class="card">
        <a href="/consultaractivo" title="Consultar Activos">
          <img src="https://t4.ftcdn.net/jpg/01/90/94/97/360_F_190949733_M7HAp5kseFBmrHcZDR1qkvG5U8uPGJvS.jpg" class="card-img-top" alt="">
        </a>
        <div class="card-body">
          <a href="/consultaractivo">Activos</a>
          <p class="card-text">En la sección Activos puede realizar el inventario de la dotación hospitaliaria en las siguientes áreas:</p>
          <li>Biomédica </li><li>|</li><li>Infreaestructura</li><li>|</li><li>Sistemas</li>
        <br><br>
          <p class="card-text"><small class="text-muted">Consulte, ingrese, edite y elimine activos</small></p>
        </div>
      </div>
      <div class="card">
        <a href="/Responsables" title="Consultar Responsables">
          <img src="https://t3.ftcdn.net/jpg/02/12/37/90/360_F_212379036_MJvCZaqX918MnI2ahUBfYBl14rW2oES1.jpg" class="card-img-top" alt="">
        </a>
          <div class="card-body">
          <a href="/Responsables">Responsables</a>
          <p class="card-text">La gestión tecnológica en salud requiere personal que esté al tanto del funcionamiento y estado de todo el equipo de las instalaciones.</p>
          <p class="card-text"><small class="text-muted">Consulte, ingrese, edite y elimine responsables</small></p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'HelloWorld',
  props: {
    msg: String
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
</style>
