<template>
<div class="form-row">
  <div class="form-group col-md-4">
    <div style="width: 400px"> <BarChart /> </div>
  </div>
  <div class="form-group col-md-4">
    <div style="width: 400px"> <DoughnutChart /> </div>
  </div>
  <div class="form-group col-md-4">
    <div style="width: 400px"> <LineChart /> </div>
  </div>
</div>
</template>

<script>
import BarChart from '../components/barChart'
import DoughnutChart from '../components/doughnutChart'
import LineChart from '../components/lineChart'

export default {
  name: 'verIndicadores',
  components: {
    BarChart,
    DoughnutChart,
    LineChart
  }
}
</script>
