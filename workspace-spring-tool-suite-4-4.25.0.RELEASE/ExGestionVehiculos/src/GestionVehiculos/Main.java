package GestionVehiculos;

import java.util.Scanner;

public class Main {

    public static void main(String[] args) {
        Scanner s = new Scanner(System.in);
        int elecc = 0; // iniciamos la lista de vehículos para que tenga algo en su interior
        Concesionario concesionario = new Concesionario();
        
        // Llenamos el concesionario con algunos vehículos
        concesionario.agregarVehiculo(new Motocicleta("Honda", "CBR500R", 6500.0f, "500cc", "Deportiva"));
        concesionario.agregarVehiculo(new Motocicleta("Yamaha", "MT-07", 7500.0f, "689cc", "Naked"));
        concesionario.agregarVehiculo(new Automovil("Ford", "Mustang", 55000.0f, "V8", true));
        concesionario.agregarVehiculo(new Automovil("Chevrolet", "Camaro", 60000.0f, "V6", false));
        concesionario.agregarVehiculo(new Automovil("Tesla", "Model S", 80000.0f, "Eléctrico", false));
        
        do {
            System.out.println("\nElige qué hacer en el concesionario:");
            System.out.println("1) Mostrar todos los vehículos");
            System.out.println("2) Agregar vehículos al inventario");
            System.out.println("3) Recomendar vehículo");
            System.out.println("4) Buscar vehículo por marca y modelo");
            System.out.println("5) Mostrar reporte de ventas");
            System.out.println("6) Mostrar estadísticas de ventas");
            System.out.println("7) Salir");
            elecc = s.nextInt();
            s.nextLine(); // Limpiar buffer

            switch (elecc) {
                case 1:
                    mostrarVehiculos(concesionario);
                    break;
                case 2:
                    agregarVehiculo(concesionario, s);
                    break;
                case 3:
                    try {
                        Vehiculo recomendado = recomendarVehiculo(concesionario);
                        System.out.println("Vehículo recomendado: " + recomendado);
                    } catch (Exception e) {
                        e.printStackTrace();
                    }
                    break;
                case 4:
                    buscarVehiculo(concesionario, s);
                    break;
                case 5:
                    Concesionario.reporteVentas(concesionario); // Llamada estática al reporte de ventas
                    break;
                case 6:
                    // Mostrar estadísticas de ventas
                    System.out.println("Total Ingresos: " + concesionario.totalIngresos());
                    System.out.println("Media pagada: " + concesionario.mediaPagada());
                    Vehiculo masVendido = concesionario.vehiculoMasVendido();
                    System.out.println("Vehículo más vendido: " + (masVendido != null ? masVendido : "No hay ventas aún."));
                    break;
                case 7:
                    System.out.println("Saliendo del programa...");
                    break;
                default:
                    System.out.println("Opción no válida. Intente de nuevo.");
                    break;
            }
        } while (elecc != 7);

        s.close();
    }

    // Método para mostrar los vehículos
    public static void mostrarVehiculos(Concesionario concesionario) {
        for (Vehiculo v : concesionario.getVehiculos()) {
            System.out.println(v);
        }
    }

    // Agregar vehículo al inventario
    public static void agregarVehiculo(Concesionario concesionario, Scanner s) {
        System.out.println("\n¿Qué tipo de vehículo quieres agregar?");
        System.out.println("1) Vehículo genérico");
        System.out.println("2) Motocicleta");
        System.out.println("3) Automóvil");
        int tipo = s.nextInt();
        s.nextLine(); // Limpiar buffer

        System.out.print("Marca: ");
        String marca = s.nextLine();
        System.out.print("Modelo: ");
        String modelo = s.nextLine();
        System.out.print("Precio: ");
        float precio = s.nextFloat();
        s.nextLine(); // Limpiar buffer

        switch (tipo) {
            case 1:
                concesionario.agregarVehiculo(new Vehiculo(marca, modelo, precio));
                System.out.println("Vehículo agregado al inventario.");
                break;
            case 2:
                System.out.print("Cilindrada: ");
                String cilindrada = s.nextLine();
                System.out.print("Tipo de Carenado: ");
                String tipoCarenado = s.nextLine();
                concesionario.agregarVehiculo(new Motocicleta(marca, modelo, precio, cilindrada, tipoCarenado));
                System.out.println("Motocicleta agregada al inventario.");
                break;
            case 3:
                System.out.print("Tipo de Motor: ");
                String tipoMotor = s.nextLine();
                System.out.print("¿Es descapotable? (true/false): ");
                boolean esDescapotable = s.nextBoolean();
                concesionario.agregarVehiculo(new Automovil(marca, modelo, precio, tipoMotor, esDescapotable));
                System.out.println("Automóvil agregado al inventario.");
                break;
            default:
                System.out.println("Tipo de vehículo no válido.");
                break;
        }
    }

    // Método para recomendar un vehículo
    public static Vehiculo recomendarVehiculo(Concesionario concesionario) {
        int rand = numRandom(0, concesionario.getVehiculos().size() - 1);
        return concesionario.getVehiculos().get(rand);
    }

    // Método random
    public static int numRandom(int min, int max) {
        int randValor = (int) (Math.random() * (max - min + 1) + min);
        return randValor;
    }

    // Buscar vehículo por marca y modelo
    public static void buscarVehiculo(Concesionario concesionario, Scanner s) {
        System.out.print("\nIngrese la marca del vehículo a buscar: ");
        String marca = s.nextLine();
        System.out.print("Ingrese el modelo del vehículo a buscar: ");
        String modelo = s.nextLine();

        boolean encontrado = false;
        for (Vehiculo v : concesionario.getVehiculos()) {
            if (v.getMarca().equalsIgnoreCase(marca) && v.getModelo().equalsIgnoreCase(modelo)) {
                System.out.println("Vehículo encontrado: " + v);
                encontrado = true;
                break;
            }
        }
        if (!encontrado) {
            System.out.println("No se encontró ningún vehículo con esa marca y modelo.");
        }
    }
}
