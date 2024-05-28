package ml.cf.collaborativefilteing;

import lombok.extern.slf4j.Slf4j;
import ml.cf.collaborativefilteing.alsmodel.Recommander;
import ml.cf.collaborativefilteing.models.Book;
import ml.cf.collaborativefilteing.models.RatingByBook;
import ml.cf.collaborativefilteing.models.RatingByUser;
import ml.cf.collaborativefilteing.models.User;
import ml.cf.collaborativefilteing.repositories.BookRepository;
import ml.cf.collaborativefilteing.repositories.RatingByBookRepository;
import ml.cf.collaborativefilteing.repositories.RatingByUserRepository;
import ml.cf.collaborativefilteing.repositories.UserRepository;
import org.apache.spark.ml.recommendation.ALSModel;
import org.springframework.boot.CommandLineRunner;
import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.context.annotation.Bean;
import org.springframework.data.cassandra.repository.config.EnableCassandraRepositories;

import java.util.Optional;

@SpringBootApplication
@EnableCassandraRepositories
@Slf4j
public class CollaborativeFilteingApplication {

	public static void main(String[] args) {
		SpringApplication.run(CollaborativeFilteingApplication.class, args);
	}


	@Bean
	CommandLineRunner loadAlsModel(Recommander recommander, BookRepository bookRepository){
		return args -> {
			log.info("<------------------------------------------- Begin Test ----------------------------");

			recommander.recommendBooksToUser(246507, 10)
					.forEach(System.out::println);
			log.info("<-------------------------------------------End Test ----------------------------");

		};
	}

}
