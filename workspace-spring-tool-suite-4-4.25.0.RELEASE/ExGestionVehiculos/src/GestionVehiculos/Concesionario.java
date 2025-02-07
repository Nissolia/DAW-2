package GestionVehiculos;

import java.util.ArrayList;

public class Concesionario {
    private ArrayList<Vehiculo> vehiculos;
    private ArrayList<Vehiculo> vehiculosVendidos;

    public Concesionario() {
        vehiculos = new ArrayList<>();
        vehiculosVendidos = new ArrayList<>();
    }

    public void agregarVehiculo(Vehiculo vehiculo) {
        vehiculos.add(vehiculo);
    }

    public void venderVehiculo(Vehiculo vehiculo, Cliente cliente) {
        if (vehiculos.contains(vehiculo)) {
            vehiculo.vender(cliente); // Marca el vehículo como vendido y lo asocia al cliente
            vehiculosVendidos.add(vehiculo);
            vehiculos.remove(vehiculo);
        }
    }

    // Método para obtener la lista de vehículos
    public ArrayList<Vehiculo> getVehiculos() {
        return vehiculos;
    }

    public static void reporteVentas(Concesionario concesionario) {
        System.out.println("Reporte de Vehículos Vendidos:");
        // Recorrer la lista de vehículos vendidos del concesionario
        for (Vehiculo v : concesionario.getVehiculos()) {
            System.out.println(v);
        }
    }


    // Estadísticas
    public double totalIngresos() {
        double total = 0;
        for (Vehiculo v : vehiculosVendidos) {
            total += v.getPrecio();
        }
        return total;
    }

    public void aplicarDescuentos() {
        for (Vehiculo v : vehiculos) {
            v.ajustarPrecio();
        }
    }

    public Vehiculo vehiculoMasVendido() {
        // Aquí podrías usar un contador por tipo de vehículo y determinar cuál fue el más vendido
        return vehiculosVendidos.isEmpty() ? null : vehiculosVendidos.get(0);
    }

    public double mediaPagada() {
        return vehiculosVendidos.isEmpty() ? 0 : totalIngresos() / vehiculosVendidos.size();
    }
}
