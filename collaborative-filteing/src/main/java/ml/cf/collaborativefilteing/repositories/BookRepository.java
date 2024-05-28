package ml.cf.collaborativefilteing.repositories;

import ml.cf.collaborativefilteing.models.Book;
import org.springframework.data.cassandra.repository.CassandraRepository;

public interface BookRepository extends CassandraRepository<Book, Integer> {
}
