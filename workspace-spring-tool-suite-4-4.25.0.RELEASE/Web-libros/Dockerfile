# Etapa de construcción
FROM maven:3.9.6-eclipse-temurin-21 AS build
WORKDIR /home/app
COPY src /home/app/src
COPY pom.xml /home/app
RUN mvn clean package

# Verifica que el JAR existe antes de continuar
RUN ls -l /home/app/target

# Etapa de ejecución
FROM eclipse-temurin:21-jdk-alpine
WORKDIR /home/app
COPY --from=build /home/app/target/*.jar app.jar
EXPOSE 8080
ENTRYPOINT ["java", "-jar", "app.jar"]
