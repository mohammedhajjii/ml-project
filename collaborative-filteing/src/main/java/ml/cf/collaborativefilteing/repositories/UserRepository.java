package ml.cf.collaborativefilteing.repositories;

import ml.cf.collaborativefilteing.models.User;
import org.springframework.data.cassandra.repository.CassandraRepository;

public interface UserRepository extends CassandraRepository<User, Integer> {
}
