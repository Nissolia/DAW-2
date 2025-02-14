package com.example.demo;

import org.apache.catalina.User;
import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.Configuration;
import org.springframework.security.core.userdetails.UserDetails;
import org.springframework.security.core.userdetails.UserDetailsService;
import org.springframework.security.crypto.password.PasswordEncoder;
import org.springframework.security.provisioning.InMemoryUserDetailsManager;

public class Config {
	@Configuration
	public class SecurityConfig {
		@Bean
		public UserDetailsService userDetailsService() {
			var userDetailsService = new InMemoryUserDetailsManager();
			UserDetails user1 = User.builder().username("admin").password(this.passwordEncoder().encode("admin"))
					.authorities("write").build();
			userDetailsService.createUser(user1);
			return userDetailsService;
		}

		@Bean
		public PasswordEncoder passwordEncoder() {
			return new BCryptPasswordEncoder();
		}
	}
}
